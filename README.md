# EDM E-Fatura Entegrasyon Kütüphanesi

Bu kütüphane, EDM E-Fatura sistemine entegrasyon sağlamak için geliştirilmiş bir PHP kütüphanesidir.

## Kurulum

Composer ile kurulum yapabilirsiniz:

```bash
composer require edm/efatura
```

## Kullanım

```php
use EDM\Efatura\Client;

$client = new Client('https://test.edmbilisim.com.tr/EFaturaEDM21ea/EFaturaEDM.svc?wsdl');
$client->login('username', 'password');

// Fatura gönderme örneği
$fatura = new \EDM\Efatura\Fatura();
// ... fatura detayları ...
$client->sendInvoice($fatura);
```

## Özellikler

- Fatura gönderme ve alma
- Gelen faturaları listeleme
- Fatura durumu sorgulama
- Kullanıcı listesi alma
- Ve daha fazlası...

## Gereksinimler

- PHP 7.4 veya üzeri
- Composer

## Lisans

MIT 