function player(config) {
    if (config.url.indexOf(".m3u8") > 0 || config.url.indexOf(".mp4") > 0 || config.url.indexOf(".flv") > 0) {
        MPlayer(config.url, config.title, config.vkey, config.next);
    } else {
        $.ajaxSettings.timeout = '30000';
        $.post("这里填写JSON解析接口", {
                "url": config.url
            },
            function (data) {
                if (data.code == "200") {
                    MPlayer(data.url, config.title, config.vkey, config.next);
                } else {
                    TheError();
                }
            }, 'json').error(function (xhr, status, info) {
            TheError();
        });
    }
}

function MPlayer(url, tittle, vkey, nexturl) {
    $("#loading").remove();
    $("body").append("<div id=\"mui-player\" class=\"content\"> <template slot=\"nextMedia\">\n" +
        "<svg t=\"1584686776454\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"1682\" width=\"22\" height=\"22\"><path d=\"M783.14692466 563.21664097L240.85307534 879.55472126c-39.1656664 24.10194914-90.38230866-6.02548665-90.38230865-51.21664226v-632.676158c0-45.19115433 51.21664097-75.31859011 90.38230865-51.21664226l542.29384932 316.33808029c39.1656664 21.08920518 39.1656664 81.34407804 0 102.43328194z\" p-id=\"1683\" fill=\"#ffffff\"></path><path d=\"M873.52923331 734.94302767c0 42.17841036-39.1656664 78.33133408-90.38230865 78.33133407s-90.38230866-36.15292371-90.38230735-78.33133407V289.05697233c0-42.17841036 39.1656664-78.33133408 90.38230735-78.33133407s90.38230866 36.15292371 90.38230865 78.33133407v445.88605534z\" p-id=\"1684\" fill=\"#ffffff\"></path></svg>\n" +
        "</template></div>");
    var playerConfig = {
        container: '#mui-player',
        themeColor: '#fa0000',
        src: url,
        title: tittle,
        autoplay: true,
        initFullFixed: true,
        preload: 'auto',
        autoOrientaion: true,
        dragSpotShape: 'square',
        lang: 'zh-cn',
        volume: '1',
        custom: {
            footerControls: [
                {
                    slot: 'nextMedia', // 对应定义的 slot 值
                    position: 'left', // 显示的位置，可选 left、right
                    tooltip: '下一集', // 鼠标悬浮在控件上显示的文字提示
                    oftenShow: true, // 是否常显示。默认为false，在 mobile 环境下竖屏状态下隐藏，pc环境判下视频容器小于500px时隐藏
                    click: function (e) { // 按钮点击事件回调
                        top.location.href = nexturl;
                    },
                    style: {}, // 自定义添加控件样式
                },
            ],
        },
        videoAttribute: [
            {
                attrKey: 'webkit-playsinline',
                attrValue: 'webkit-playsinline'
            },
            {
                attrKey: 'playsinline',
                attrValue: 'playsinline'
            },
            {
                attrKey: 'x5-video-player-type',
                attrValue: 'h5-page'
            },
        ],
        plugins: [
            new MuiPlayerDesktopPlugin({
                leaveHiddenControls: true,
                fullScaling: 1,
            }),
            new MuiPlayerMobilePlugin({
                key: '01I01I01H01J01L01K01J01I01K01J01H01D01J01G01E',
                showMenuButton: true,
            })
        ]
    };
    if (url.indexOf("m3u8") > 0) {
        playerConfig.parse = {
            type: 'hls',
            loader: Hls,
            config: {
                debug: false,
            },
        };
    } else if (url.indexOf("flv") > 0) {
        playerConfig.parse = {
            type: 'flv',
            loader: flvjs,
            config: {
                cors: true,
            },
        };
    }
    var mp = new MuiPlayer(playerConfig);
    mp.on('ready', function () {
        var video = mp.video();
        var currentTime = localStorage.getItem(vkey);
        video.addEventListener("loadedmetadata", function () {
            this.currentTime = currentTime;
        });
        video.addEventListener("timeupdate", function () {
            var currentTime = Math.floor(video.currentTime);
            localStorage.setItem(vkey, currentTime);
        });
        video.addEventListener("ended", function () {
            localStorage.removeItem(vkey);
            if (!!nexturl) {
                top.location.href = nexturl;
            }
        });
        if (isEmpty(nexturl)) {
            $(".footer-control[slot='nextMedia']").remove();
        }
    });
    mp.on('ready', function () {
        //mp.showToast('手机端请手动点击播放');
        mp.showToast('提醒：请勿随意相信视频上网址,电话,二维码等！', 6000)
    });
    mp.on('error', function () {
        mp.showToast('视频加载失败，切换线路或刷新一次', 5000)
    });
    mp.on('seek-progress', function () {
        mp.showToast('加载中...')
    });
}

function TheError() {
    $("body").append("<div id=\"error\"><h1>解析失败，请稍后再试~</h1></div>");
    $("#loading").remove();
}

function isEmpty(obj) {
    if (typeof obj == "undefined" || obj == null || obj == "") {
        return true;
    } else {
        return false;
    }
}