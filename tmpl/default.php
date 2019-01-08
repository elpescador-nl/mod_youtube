<?php defined('_JEXEC') or die;

echo $pretext; ?>

<div class="embed-responsive embed-responsive-16by9">
	<div id="player-<?php echo $label; ?>" class="embed-responsive-item"></div>
</div>

<?php echo $posttext; ?>

<script>
var players = players || [];
function onYouTubeIframeAPIReady() {
	var player = new YT.Player('player-<?php echo $label; ?>', {
		height: '100%',
		width: '100%',
<?php if($videoid): ?>
		videoId: '<?php echo $videoid; ?>',
<?php else: ?>
		playerVars: { listType:'playlist', list: '<?php echo $playlist; ?>' },
<?php endif; ?>
		events: {
			'onStateChange': function (event) {

				if(typeof ga !== 'undefined') {
					var label = '<?php echo $label; ?>';
					switch (event.data) {
						case YT.PlayerState.PLAYING:
							ga('send', 'event', 'video', 'play', label); break;
						case YT.PlayerState.PAUSED:
							ga('send', 'event', 'video', 'pause', label); break;
						case YT.PlayerState.ENDED:
							ga('send', 'event', 'video', 'end', label); break;
					}
				}
			}
		}
	});
	players.push(player);
}
</script>
