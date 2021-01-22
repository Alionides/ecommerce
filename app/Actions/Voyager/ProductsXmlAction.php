<?php

namespace App\Actions\Voyager;

use TCG\Voyager\Actions\AbstractAction;

class ProductsXmlAction extends AbstractAction {
    public function getTitle() {
        return 'Preview';
    }

    public function getIcon() {
        return 'voyager-eye';
    }

    public function getAttributes() {
        //Action button classes
        return [
            'class' => 'btn btn-sm btn-primary pull-left',
        ];
    }

    public function shouldActionDisplayOnDataType() {
        //Display this action only for the Posts
        // this will display on products page as buttons like create edit delete
       // return $this->dataType->slug === 'products';
    }
    public function massAction($ids, $comingFrom)
    {
        // Do something with the IDs
        return redirect($comingFrom);
    }

    public function getDefaultRoute() {
        return route('products.xml', array("id"=>$this->data->{$this->data->getKeyName()}));
    }
}