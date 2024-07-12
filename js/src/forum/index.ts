import app from 'flarum/forum/app';
import Store from './StoreHelper';
import { initStore } from './storeInit';
import { PurchaseHelper, UseHelper } from '@xypp-store/forum';

app.initializers.add('xypp/store-template', () => {
  initStore(app);
  setTimeout(async () => {
    //You can use PurchaseHelper and UseHelper to use store without opening corresponding page.
    // const helper = await Store.UseHelper.get("fake-item-test");
    const helper = await UseHelper.get("fake-item-test");
    //Ask use to select a item to use.
    await helper.filterAvailable().expireTime().query();
    if (helper.hasItem()) {
      await helper.use("data here");
    }
  }, 1000);
});
