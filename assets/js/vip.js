const superVip = (function() {

	const _CONFIG_ = {
		isMobile: navigator.userAgent.match(
			/(Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini)/i),
		currentPlayerNode: null,
		vipBoxId: 'vip_jx_box' + Math.ceil(Math.random() * 100000000),
		flag: "flag_vip",
		autoPlayerKey: "auto_player_key" + window.location.host,
		autoPlayerVal: "auto_player_value_" + window.location.host,
		videoParseList: [{
				"name": "综合",
				"type": "1,3",
				"url": "https://jx.jsonplayer.com/player/?url="
			},
			{
				"name": "Ckplayer",
				"type": "1,3",
				"url": "https://www.ckplayer.vip/jiexi/?url="
			},
            {
				"name": "夜幕",
				"type": "1,3",
				"url": "https://www.yemu.xyz/?url="
			},
            {
				"name": "暂不支持",
				"type": "2",
				"url": "https://ichen.ink/?url="
			},
            {
				"name": "8090g",
				"type": "1,3",
				"url": "https://www.8090g.cn/?url="
			},
            {
				"name": "playm3u8",
				"type": "1,3",
				"url": "https://www.playm3u8.cn/jiexi.php?url="
			},
            {
				"name": "云析",
				"type": "1,3",
				"url": "https://jx.yparse.com/index.php?url="
			},
            {
				"name": "8090接口②",
				"type": "1,3",
				"url": "https://www.8090.la/8090/?url="
			},
		],
