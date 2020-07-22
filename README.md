add currency to db:

php artisan tinker

$currency = new App\Currency;
$currency->name = "USD";
$currency->rate = 1;
$currency->save();
$currency = new App\Currency;
$currency->name = "EUR";
$currency->rate = 1.16;
$currency->save();
$currency = new App\Currency;
$currency->name = "RUB";
$currency->rate = 71.11;
$currency->save();
