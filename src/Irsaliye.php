<?php
namespace EDM\WebApi;

class Irsaliye
{
    private $evrakno;
    private $evraktarih;

    /**
     * @return mixed
     */
    public function getEvrakno()
    {
        return $this->evrakno;
    }

    /**
     * @param mixed $evrakno
     */
    public function setEvrakno($evrakno)
    {
        $this->evrakno = $evrakno;
    }

    /**
     * @return mixed
     */
    public function getEvrakTarih()
    {
        return $this->evraktarih;
    }

    /**
     * @param mixed $evraktarih
     */
    public function setEvrakTarih($evraktarih)
    {
        $this->evraktarih = $evraktarih;
    }

    public function readXML(){
        $xmlStr = '<cac:DespatchDocumentReference>';
        $xmlStr.='<cbc:ID>'.$this->getEvrakno().'</cbc:ID>';
        $xmlStr.='<cbc:IssueDate>'.$this->getEvrakTarih().'</cbc:IssueDate>';
        $xmlStr.='</cac:DespatchDocumentReference>';
    }


}