# HOSTINPL-Credit-Card-Gateway

[English](#english) | [Русский](#russian)

<a name="english"></a>
## English

HOSTINPL 5.6 accept Credit/Debit cards Visa - Mastercard instantly without sign up. USDC/USDT instant payouts.

### Installation Instructions

* In your `application/config.php`
* Enable each gateway and set your own USDC wallet as follows:

```php
'paygatehosted' => '1',
'paygatehosted_wallet' => '0xF977814e90dA44bFA03b6295A0616a897441aceC',
'alchemypay' => '1',
'alchemypay_wallet' => '0xF977814e90dA44bFA03b6295A0616a897441aceC',
'mercuryo' => '1',
'mercuryo_wallet' => '0xF977814e90dA44bFA03b6295A0616a897441aceC',
'moonpay' => '1',
'moonpay_wallet' => '0xF977814e90dA44bFA03b6295A0616a897441aceC',
```

* Update your controller file in `/application/controllers/account/pay.php`  
  Note that you may need to manually insert the code into the file to avoid losing any current payment gateways in your setup.

* Update your views file in `/application/views/account/pay.php`  
  Note that you may need to manually insert the code into the file to avoid losing any current payment gateways in your setup.

* Add payment logos `/application/public/img/pay/`
* Upload the callback files to `/application/controllers/result/`
* You can add more payment providers by following our [API DOCS](https://paygate.to/instant-payment-gateway/#postman)
* If your currency is not USD you may need to add a currency conversion logic to the callback files or contact our support team for help.

---

<a name="russian"></a>
## Русский

HOSTINPL 5.6 принимает кредитные/дебетовые карты Visa - Mastercard мгновенно без регистрации. Мгновенные выплаты в USDC/USDT.

### Инструкции по установке

* В вашем файле `application/config.php`
* Включите каждый шлюз и установите свой собственный USDC кошелек следующим образом:

```php
'paygatehosted' => '1',
'paygatehosted_wallet' => '0xF977814e90dA44bFA03b6295A0616a897441aceC',
'alchemypay' => '1',
'alchemypay_wallet' => '0xF977814e90dA44bFA03b6295A0616a897441aceC',
'mercuryo' => '1',
'mercuryo_wallet' => '0xF977814e90dA44bFA03b6295A0616a897441aceC',
'moonpay' => '1',
'moonpay_wallet' => '0xF977814e90dA44bFA03b6295A0616a897441aceC',
```

* Обновите файл контроллера в `/application/controllers/account/pay.php`  
  Обратите внимание, что вам может потребоваться вручную вставить код в файл, чтобы не потерять текущие платежные шлюзы в вашей настройке.

* Обновите файл представлений в `/application/views/account/pay.php`  
  Обратите внимание, что вам может потребоваться вручную вставить код в файл, чтобы не потерять текущие платежные шлюзы в вашей настройке.

* Добавьте логотипы платежных систем в `/application/public/img/pay/`
* Загрузите файлы обратного вызова в `/application/controllers/result/`
* Вы можете добавить больше платежных провайдеров, следуя нашей [API-документации](https://paygate.to/instant-payment-gateway/#postman)
* Если ваша валюта не USD, вам может потребоваться добавить логику конвертации валют в файлы обратного вызова или обратиться в нашу службу поддержки за помощью.