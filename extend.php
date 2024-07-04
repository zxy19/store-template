<?php

/*
 * This file is part of xypp/store-template.
 *
 * Copyright (c) 2024 小鱼飘飘.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Xypp\\StoreTemplate;

use Flarum\Extend;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/less/forum.less'),
    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js')
        ->css(__DIR__.'/less/admin.less'),
    new Extend\Locales(__DIR__.'/locale'),
    (new \Xypp\Store\Extend\StoreItemProvider())->provide('fake', function ($item) {
        // Function that provide data of the item.
        //$item->provider_data should be the data user input when create the item. Usually id.

        // $fake = Fake::findOrFail($item->provider_data);
        // return [
        //     "name" => $fake->name,
        //     "desc" => $fake->desc,
        //     "type" => $fake->type,
        //     "id" => $fake->id
        // ];

        //these attributes will be sent to frontend in field itemData
    }, function ($actor, $item) {
        // Function that make effect when user buy this item.
        // if some action is not completed, return false
        return true;
    })->limit('fake', function ($actor, $item, $count) {
        //Function that check if user can buy this item.
        //$count means how many items user bought.
        return true;
    })
];
