add currency to db:

php artisan tinker

$currency = new App\Currency;
$currency->name = "USD";
$currency->save();
$rate = new Rate();
$rate->rate = 1;
$currency->rates()->save($rate);

$currency = new App\Currency;
$currency->name = "EUR";
$currency->save();
$rate = new Rate();
$rate->rate = 1.16;
$currency->rates()->save($rate);


$currency = new App\Currency;
$currency->name = "RUB";
$currency->save();
$rate = new Rate();
$rate->rate = 71.05;
$currency->rates()->save($rate);



$currency = App\Currency:find(7);
$rate = new Rate();
$rate->rate = 1;
$currency->rates()->save($rate);
