<div class='pyre_metabox'>
<?php

$this->text(	'portfolio_street_address',
				'Street Address',
				'Street address of the project'
			);

$this->text(	'portfolio_suburb',
				'Suburb',
				'Suburb of the project'
);

$this->select(	'portfolio_type',
			'Property Type',
			array('apartment' => 'Apartment','house' => 'House','land' => 'Land'),
			''
			);

$this->text(	'portfolio_minprice',
				'Min Price',
				'Min Price of the project'
);

$this->text(	'portfolio_bedrooms',
				'Bedroom Number',
				'Bedroom Number of the project'
);

$this->text(	'portfolio_sales_stage',
				'Sales Stage',
				'Sales Stage of the project'
);

$this->text(	'portfolio_settlement_date',
				'Settlement Date',
				'Settlement Date of the project'
);

$this->text(	'portfolio_slider_name',
				'Slider Name',
				'To display a slider, put the name of the slider.'
);

$this->select(	'new_project',
			'New Project',
			array('no' => 'No', 'yes' => 'Yes'),
			''
			);

$this->text(	'video_link',
				'Video Link',
				'Paste in your video link here.'
			);
$this->textarea(	'video_embed_code',
				'Video Embed Code',
				'Paste in your video embed code.'
			);
$this->text(	'portfolio_external_link',
			'Link to another page',
			'Link your portfolio index post to another web-page.'
			);

$this->select(	'special_property',
			'Belong to Portfolio',
			array('yes' => 'Yes','no' => 'No'),
			''
			);

$this->select(	'featured_property',
			'Featured Portfolio',
			array('no' => 'No', 'yes' => 'Yes'),
			''
			);
?>
</div>
