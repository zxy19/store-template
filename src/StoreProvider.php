<?php
namespace Xypp\StoreTemplate;

use Flarum\Discussion\Discussion;
use Flarum\Foundation\ValidationException;
use Flarum\User\User;
use Xypp\Store\AbstractStoreProvider;
use Xypp\Store\Context\PurchaseContext;
use Xypp\Store\Context\UseContext;
use Xypp\Store\PurchaseHistory;
use Xypp\Store\StoreItem;
use Carbon\Carbon;
use Xypp\Store\Context\ExpireContext;

class StoreProvider extends AbstractStoreProvider
{
    public $name = "fake-item";

    public function expire(PurchaseHistory $item, ExpireContext $context): bool
    {
        // Do when the item is delete/expire.
        // You can do anything to clean up the data.
        // Return true if everything is ok.
        return true;
    }
    public function purchase(StoreItem $item, User $user, PurchaseHistory|null $old = null, PurchaseContext $context): array|bool|string
    {
        // Do when user purchase this item.
        // You should do anything to mark this user as one who own this item.
        // You can return false if something is not completed.
        // return false;
        // Or just throw an ValidationException
        // throw ValidationException(["error"=>"error"])
        // Or return a string to be fill in the data field of the item.

        // If a update happened, you will receive the old item in $old.
        return true;
    }

    public function useItem(PurchaseHistory $item, User $user, string $data, UseContext $context): bool
    {
        //[Optional]
        // When $canUse is true, this function MUST be implemented.
        // do anything when using this item.
        return false;
    }
}