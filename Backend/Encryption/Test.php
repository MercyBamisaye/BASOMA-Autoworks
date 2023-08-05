<?php
require_once "Encryption.php";

$enc = new Encryption("potato");
var_dump($enc->getAESEncrypt());

var_dump($enc->getAESDecrypt("tfYT5NRXYpqMeqdR/JHp8Q=="));
var_dump($enc->getAESDecrypt("tVEWYi03wZR8mVXnZexOiQ"));
var_dump($enc->getAESDecrypt("G7lT2R4cdvFhOxHBNnoNMg=="));
var_dump($enc->getAESDecrypt("3VYwEZZWeLPu6e7yVma"));

$enc = new Encryption("BBWiSE is the best in all");
var_dump($enc->getBBWiSEEncrypt());

$enc = new Encryption("BBWiSE SLSJLJSG"); //"tVEWYi03wZR8mVXnZexOiQ"
var_dump($enc->getBBWiSEEncrypt());

$enc = new Encryption("Background of the Study
Solid Waste is one of the most daunting environmental sanitation concerns confronting the globe today, and despite massive expenditures in the industry, it has consistently declined (African Union 2015). In today’s world, many goods are intended to be used once and then discarded. Many of our consumers’ habits are defined by single-use packaging and throwaway goods. According to Negm & Shareef (2020), waste problems are a society’s reflection. There is a strong relationship between a society’s economic, historical, cultural, and environmental conditions and its state. These factors vary by country, city, or community, just as waste concerns do. Understanding the status of a civilization consequently leads to an appreciation of the waste issues that exist in that society. In contrast, it is feasible to determine the condition of a civilization by examining its garbage problems (Negm, & Shareef, 2020).
Waste management issues are constantly on the rise. Due to its negative environmental consequences, Solid Waste Management (SWM) is a worldwide demanding issue, especially in developing nations (Zainu, & Songip 2017). The development of solid wastes is a critical environmental issue in developing nations, as well as a major worry in wealthy ones due to the environmental problems that result from its improper management and disposal. Globally, the creation of solid waste is mostly driven by population expansion, technological advancements, and economic growth. As new subdivisions are developed, urbanization has led to a rise in the output of garbage from residential sites, private and public utility facilities, and building and demolition operations (Katiyar, 2016). In recent years, this has garnered the interest of academics in both wealthy and developing nations. However, while waste generation in the developed world is managed effectively through the implementation of consistent waste policies, waste generation in developing countries of the global south, particularly Nigeria, is not managed effectively due to the absence of effective implementation of consistent waste policies. This has made solid waste management the most urgent environmental issue in Nigerian cities.
");
var_dump($enc->getAESEncrypt());
var_dump($enc->getAESDecrypt($enc->getAESEncrypt()));


?>