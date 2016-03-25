<div class='pyre_metabox'>
<?php
if(current_user_can('manage_options')){
	$readOnly=null;
}else{
	$readOnly=true;
}
$this->text(	'external_link',
				'External Link',
				'Use this to link to another webpage.',
				$readOnly
			);
?>
<?php
$this->text(	'external_link_target',
				'External Link Target',
				'Type _blank to open your external link a new window.',
				$readOnly
			);
?>
<?php
$this->text(	'remove_caption',
				'Remove Caption?',
				'Type "true" to remove the caption from the featured slide.',
				 $readOnly
			);
?>

<?php
$this->textarea(	'video_embed_code',
				'Property Single Video Embed Code',
				'Paste in your video embed code to have a video inline with a gallery.',
				$readOnly
			);

?>

<?php
$this->textarea(	'video_embed_code2',
				'Override Property Single Video Embed Code',
				'Paste in your video embed code to have our video over-ride the property gallery.',
				$readOnly
			);

?>
</div>