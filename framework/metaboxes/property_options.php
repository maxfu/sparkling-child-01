<div class='pyre_metabox'>
<?php
if(current_user_can('manage_options')){
	$readOnly=null;
}else{
	$readOnly=true;
}

$this->textarea(	'full_address',
				'Google Maps Full Address',
				'Paste full address for google maps location.   Ex: 1457 Golf Course Dr, Windsor, CA 95492',
				$readOnly
			);
$this->text(	'address',
			'Address',
			'Paste in  your street number and street.  Ex: 1457 Golf Course Dr',
			$readOnly
			);
			
$this->select(	'country',
			'Country',
			array('Australia' => 'Australia'),
			'Default:Australia',
			$readOnly
			);			
			

$this->text(	'city',
			'City',
			'Paste in your city.  Ex:  Windsor',
             $readOnly
			);	

$this->text(	'suburb',
			'Suburb',
			'Paste in your Suburb.',
             $readOnly
			);
						
			
$this->select(	'state',
			'State',
            array(
            'Australian Capital Territory' => 'Australian Capital Territory',
            'New South Wales'=>'New South Wales',
            'Northern Territory'=>'Northern Territory',
            'Queensland'=>'Queensland',
            'South Australia'=>'South Australia',
            'Tasmania'=>'Tasmania',
            'Victoria'=>'Victoria',
            'Western Australia'=>'Western Australia'),
			'Paste select state.',
            $readOnly
			);
$this->text(	'zip',
			'Zip Code',
			'Paste in your zip code.  Ex. 95492',
			$readOnly
			);
$this->text(	'price',
			'Price',
			'Type price in using only numbers.',
			$readOnly
			);
$this->select(	'status',
			'Property Status',
			array('For Rent' => 'For Rent', 'For Sale' => 'For Sale','Sold'=>'Sold','Leased'=>'Leased'),
			'',
			$readOnly
			);
			
//add 2013-12-13
$this->text(	'floor',
			'Floor No.',
			'Paste in your floor number.  Ex. 10(Special for unit type)',
			$readOnly
			);

$this->text(	'room',
			'Room No.',
			'Paste in your room number.  Ex. 18(Special for unit type)',
			$readOnly
			);	
			
$query_search = new WP_Query(array(
			'post_type' => 'portfolio',
			'posts_per_page' => -1,
			'meta_key' => 'pyre_special_property', 
			'meta_value' => 'yes', 
			'meta_compare' => '='
		));
$potfilo[0]=null;
foreach($query_search->posts as $p)	
{
	$potfilo[$p->ID]=$p->post_title;
}		
$this->select( 'portfoliotype', 
				'Select Portfolio', 
				$potfilo, 
				'this select is special for portfolio', 
				$readOnly);	
							
$this->text(	'open',
			'Open House',
			'Choose an open house date and time.  Ex. Fri 2/18, 2pm - 4pm',
			$readOnly
			);
$this->text(	'bedrooms',
			'Bedrooms',
			'Type number of bedrooms in using only numbers',
			$readOnly
			);
$this->text(	'bathrooms',
			'Bathrooms',
			'Type number of bathrooms in using only numbers',
			$readOnly
			);
$this->text(	'garage',
			'Number of Car Garage',
			'Type number of car garage in using only numbers',
			$readOnly
			);
$this->text(	'size',
			'Land Size (in sqm)',
			'Type number of sqm using only numbers',
			$readOnly
			);
$this->text(	'lot',
			'Lot (in sqm)',
			'Type number of sqm using only numbers',
			$readOnly
			);
			
$label="Towards";
if(of_get_option('towards_text',true))
{
	$label=of_get_option('towards_text',true);
}			
$this->text(	'towards',
			$label,
			'Paste in towards',
			$readOnly
			);
$label="Custom Attribute Text 1";
if(of_get_option('custom_attribute_1_text',true))
{
	$label=of_get_option('custom_attribute_1_text',true);
}
$this->text(	'custom_text1',
			$label,
			'Custom text 1',
			$readOnly
			);
			
$label="Custom Attribute Text 2";
if(of_get_option('custom_attribute_2_text',true))
{
	$label=of_get_option('custom_attribute_2_text',true);
}				
$this->text(	'custom_text2',
			$label,
			'Custom text 2',
			$readOnly
			);					
					
$this->text(	'built',
			'Year Built',
			'Type year using only numbers',
			$readOnly
			);
$agents = freehold_all_authors();

$this->checkbox_group('agent', 'Select Agent', $agents, '', $readOnly,$html = '');


$this->text(	'no_agent',
				'Disable Agent',
				'Type True to disable the agent for this specific listing.',
				$readOnly
			);
	
?>
</div>		
						
						