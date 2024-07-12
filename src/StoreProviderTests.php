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

class StoreProviderTests extends AbstractStoreProvider
{
    public $name = "fake-item-test";
    public $canUseFrontend = true;
    public function canUse(StoreItem $item, User $user)
    {
        return true;
    }
    public function canPurchase(StoreItem $item, User $user): bool|string
    {
        return true;
    }
    public function expire(PurchaseHistory $item): bool
    {
        return true;
    }
    public function purchase(StoreItem $item, User $user, PurchaseHistory|null $old = null, PurchaseContext $context): array|bool|string
    {
        $context->noConsume();
        $context->noCostMoney();
        return true;
    }

    public function useItem(PurchaseHistory $item, User $user, string $data, UseContext $context): bool
    {
        $context->successMessage("test");
        return true;
    }
}