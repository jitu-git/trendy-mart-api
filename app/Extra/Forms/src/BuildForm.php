<?php


namespace App\Extra\Forms\src;

use DOMDocument;
use Illuminate\Support\Facades\Log;

abstract class BuildForm implements FormInterface
{

    private $dom;

    /**
     * Not in used
     *
     * this can build html holder with nested inputs
     *
     * @method build
     * @param array $field
     */
    public function build(array $field)
    {

       /* $this->dom = new DOMDocument('1.0');
        $html_dom = '';
        if(isset($field["holder"])){
            $this->createElement($field["holder"], $html_dom);
            dd($html_dom);
        }

        $table = $dom->createElement('table');
        $domAttribute = $dom->createAttribute('id');
        $domAttribute->value = 'my_table';

        $tr = $dom->createElement('tr');
        $table->appendChild($tr);

        $td = $dom->createElement('td', 'Label');
        $tr->appendChild($td);

        $td = $dom->createElement('td', 'Value');
        $tr->appendChild($td);

        $table->appendChild($domAttribute);

        $this->dom->appendChild($html_dom);
        dd ($this->dom->saveHTML());

        dd("here", $field);
        */
    }

    /**
     *  Not in used
     * @param type $holder
     * @param type $parent
     * @return type
     */
    private function createElement($holder, &$parent)
    {
        /*if($holder){
            foreach ($holder as $tag => $attribute){
                $html_tag = $this->dom->createElement($tag);
                if(is_array($attribute)){
                    foreach ($attribute as $attr => $value){
                        if($attr === "attribute"){
                            foreach ($value as $att => $value){
                                $holderAttr = $this->dom->createAttribute($attr);
                                $holderAttr->value =  is_array($value) ? implode(" ", $value) : $value;
                                $html_tag->appendChild($holderAttr);
                                if($parent != '')
                                    $parent->appendChild($html_tag);
                            }
                        } else {
                            if($parent != '')
                                $parent->appendChild($html_tag);
                            if(is_array($attribute[$attr])){
                                return $this->createElement($attribute[$attr], $html_tag);
                            } else {
                                return ($parent);
                            }

                        }
                    }
                }
            }
        }*/
    }
}
