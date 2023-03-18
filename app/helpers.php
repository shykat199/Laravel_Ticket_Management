<?php

use App\Models\BlogPost;
use App\Models\BusDestination;
use App\Models\SightSetting;

function blogPosts()
{
    $blogPosts = BlogPost::select('post_title', 'post_description', 'post_image', 'created_at')
        ->offset(0)
        ->limit(3)
        ->get();
    return $blogPosts;
}

function recentTickets()
{
    $blogPosts = BusDestination::select('starting_point', 'arrival_point', 'ticket_price')
        ->offset(0)
        ->limit(3)
        ->get();
    return $blogPosts;
}

function getBusCoach($busId = 0, $selected = 0)
{

    if ($busId > 0) {
        $coachName = \App\Models\BusDetails::where('company_id', $busId)->get();
    } else {
        $coachName = \App\Models\BusDetails::all();
    }
    $html = '<option value="">Select Coach</option>';
    if (!empty($coachName)) {
        foreach ($coachName as $name) {
            $html .= '<option value="' . $name->id . '"';
            if ($name->id == $selected) {
                $html .= ' selected ';
            }
            $html .= ' >' . ucfirst($name->bus_coach) . '</option>';
        }
    }
    return $html;
}


function documents(): array
{
    $document = ['Passport', 'Driving Licence', 'NID', 'Birth Certificate'];
    return $document;
}

function nationals(): array
{
    $nationals = array(
        'Afghan',
        'Albanian',
        'Algerian',
        'American',
        'Andorran',
        'Angolan',
        'Antiguans',
        'Argentinean',
        'Armenian',
        'Australian',
        'Austrian',
        'Azerbaijani',
        'Bahamian',
        'Bahraini',
        'Bangladeshi',
        'Barbadian',
        'Barbudans',
        'Batswana',
        'Belarusian',
        'Belgian',
        'Belizean',
        'Beninese',
        'Bhutanese',
        'Bolivian',
        'Bosnian',
        'Brazilian',
        'British',
        'Bruneian',
        'Bulgarian',
        'Burkinabe',
        'Burmese',
        'Burundian',
        'Cambodian',
        'Cameroonian',
        'Canadian',
        'Cape Verdean',
        'Central African',
        'Chadian',
        'Chilean',
        'Chinese',
        'Colombian',
        'Comoran',
        'Congolese',
        'Costa Rican',
        'Croatian',
        'Cuban',
        'Cypriot',
        'Czech',
        'Danish',
        'Djibouti',
        'Dominican',
        'Dutch',
        'East Timorese',
        'Ecuadorean',
        'Egyptian',
        'Emirian',
        'Equatorial Guinean',
        'Eritrean',
        'Estonian',
        'Ethiopian',
        'Fijian',
        'Filipino',
        'Finnish',
        'French',
        'Gabonese',
        'Gambian',
        'Georgian',
        'German',
        'Ghanaian',
        'Greek',
        'Grenadian',
        'Guatemalan',
        'Guinea-Bissauan',
        'Guinean',
        'Guyanese',
        'Haitian',
        'Herzegovinian',
        'Honduran',
        'Hungarian',
        'I-Kiribati',
        'Icelander',
        'Indian',
        'Indonesian',
        'Iranian',
        'Iraqi',
        'Irish',
        'Israeli',
        'Italian',
        'Ivorian',
        'Jamaican',
        'Japanese',
        'Jordanian',
        'Kazakhstani',
        'Kenyan',
        'Kittian and Nevisian',
        'Kuwaiti',
        'Kyrgyz',
        'Laotian',
        'Latvian',
        'Lebanese',
        'Liberian',
        'Libyan',
        'Liechtensteiner',
        'Lithuanian',
        'Luxembourger',
        'Macedonian',
        'Malagasy',
        'Malawian',
        'Malaysian',
        'Maldivan',
        'Malian',
        'Maltese',
        'Marshallese',
        'Mauritanian',
        'Mauritian',
        'Mexican',
        'Micronesian',
        'Moldovan',
        'Monacan',
        'Mongolian',
        'Moroccan',
        'Mosotho',
        'Motswana',
        'Mozambican',
        'Namibian',
        'Nauruan',
        'Nepali',
        'New Zealander',
        'Nicaraguan',
        'Nigerian',
        'Nigerien',
        'North Korean',
        'Northern Irish',
        'Norwegian',
        'Omani',
        'Pakistani',
        'Palauan',
        'Panamanian',
        'Papua New Guinean',
        'Paraguayan',
        'Peruvian',
        'Polish',
        'Portuguese',
        'Qatari',
        'Romanian',
        'Russian',
        'Rwandan',
        'Saint Lucian',
        'Salvadoran',
        'Samoan',
        'San Marinese',
        'Sao Tomean',
        'Saudi',
        'Scottish',
        'Senegalese',
        'Serbian',
        'Seychellois',
        'Sierra Leonean',
        'Singaporean',
        'Slovakian',
        'Slovenian',
        'Solomon Islander',
        'Somali',
        'South African',
        'South Korean',
        'Spanish',
        'Sri Lankan',
        'Sudanese',
        'Surinamer',
        'Swazi',
        'Swedish',
        'Swiss',
        'Syrian',
        'Taiwanese',
        'Tajik',
        'Tanzanian',
        'Thai',
        'Togolese',
        'Tongan',
        'Trinidadian/Tobagonian',
        'Tunisian',
        'Turkish',
        'Tuvaluan',
        'Ugandan',
        'Ukrainian',
        'Uruguayan',
        'Uzbekistani',
        'Venezuelan',
        'Vietnamese',
        'Welsh',
        'Yemenite',
        'Zambian',
        'Zimbabwean'
    );

    return $nationals;
}

function months()
{
    $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    return $months;
}

function years()
{

    $year_array = array();
    $current_year = date('Y');
    $max_year = $current_year + 10;
    for ($i = $current_year; $i <= $max_year; $i++) {
        $year_array[$i] = $i;
    }
    return $year_array;
}

function contactUs(){

    $contactUs=SightSetting::all();
    //$contactUs=SightSetting::select('*')->where('key','=','About Us')->get();

    return $contactUs;
}
