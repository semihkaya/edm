<?php
namespace EDM\WebApi;

class Request
{
    public $hataMesaj;
    public $hataKod;

    public function send($func_name, $param)
    {
        try {
            // Başlangıç değerlerini açıkça tanımla
            $this->hataKod = "0";
            $this->hataMesaj = "Başarılı";

            // Util::$service_url kontrolü
            if (!isset(Util::$service_url) || empty(Util::$service_url)) {
                throw new \Exception("Servis URL tanımlı değil veya boş.");
            }

            // SOAP istemcisi oluştur
            $istemci = new \SoapClient(Util::$service_url, ['trace' => 1, 'exceptions' => true]);

            // SOAP çağrısını yap
            $sonuc = $istemci->__soapCall($func_name, [$param]);

            // Sonucu döndür
            return $sonuc;
        } catch (\SoapFault $hata) {
            // Sadece SOAP hatasını döndür
            $this->hataKod = $hata->faultcode ?? "Bilinmiyor";
            $this->hataMesaj = $hata->faultstring ?? "Bilinmiyor";

            // SOAP Hatasını döndür
            return "SOAP Hatası: " . $this->hataMesaj;
        } catch (\Exception $e) {
            // Genel istisnaları yakala
            $this->hataKod = "GENEL_HATA";
            $this->hataMesaj = $e->getMessage();

            // Genel hata mesajını döndür
            throw new \Exception("Hata: " . $this->hataMesaj);
        }
    }
}
