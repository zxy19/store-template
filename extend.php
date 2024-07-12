<?php

/*
 * This file is part of xypp/store-template.
 *
 * Copyright (c) 2024 小鱼飘飘.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Xypp\StoreTemplate;

use Flarum\Extend;
use Flarum\User\User;
use Xypp\Store\Context\PurchaseContext;
use Xypp\Store\Context\UseContext;
use Xypp\Store\PurchaseHistory;
use Xypp\Store\StoreItem;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__ . '/js/dist/forum.js')
        ->css(__DIR__ . '/less/forum.less'),
    new Extend\Locales(__DIR__ . '/locale'),

    /**
     * **[IMPORTANT] All methods MUST explicitly throw an error that can be caught. Or the rollback may fail**
     */

    (new \Xypp\Store\Extend\StoreItemProvider())
        //Normally create the provider with a class extends AbstractStoreProvider
        ->provide(StoreProvider::class)
        //Or use the simple method
        ->simple(
            "fake-item-test",
            function (StoreItem $item, User $user, PurchaseHistory|null $old = null, PurchaseContext $context): array|bool|string {
                // You can use $context to control the behavior of the purchase&use.
                $context->noConsume();
                $context->noSave();
                // Throw an exception to show an alert.
                $context->exceptionWith("xxxxx.forum.xxxx.xxx");
                return true;
            },
            function (PurchaseHistory $item, User $user, string $data, UseContext $context): bool {
                // Use item is allow to show a message after success
                $context->successMessage("test");
                return true;
            }
        )
];
