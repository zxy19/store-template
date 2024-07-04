import { extend, override } from 'flarum/common/extend';
import ForumApplication from 'flarum/forum/ForumApplication';

export function storeInit(app: ForumApplication) {
  const TYPE_NAME = "fake";
  /**
   * The code below is create a preview box for store card in the store page.
   */
  override((flarum.extensions['xypp-store'].StoreItemUtils as any).prototype, 'createItemShowCase', function (org: any, items: any) {
    // Only need to handle our own type.
    if (items.provider() != TYPE_NAME) {
      return org(items);
    }
    // get Item data from server.(Set by attributes)
    const info: {
      id: string;
      random: number;
    } = items.itemData();


    return (
      <div class="test-fake-item">
        {info.random}
      </div>
    );
  });

  /**
   * The code below make Select on createItemModal recognize our provider.
   */
  override((flarum.extensions['xypp-store'].CreateItemModal as any).prototype, 'getProviderData', async function (origin: (e: string) => Promise<any>, e: string) {
    if (e == TYPE_NAME) {
      // Actually, there should be code to get all items that can be used by shop.
      //However we have no database for the example. So the code below will not actually work.
      /**
      const data = await app.store.find('user_decoration_all');
      //@ts-ignore
      const that = this;
      app.store.all('data-fake').forEach((fake) => {
        that.providerDatas[parseInt(fake.id() as string)] =fake.attribute('name');
      });
       */
      //this.providerDatas will finally be shown in the modal.
    }
    await origin(e);
  } as any);

  /**
   * The code below make Select on createItemModal recognize our provider.
   */
  extend((flarum.extensions['xypp-store'].CreateItemModal as any).prototype, 'oninit', function () {
    this.providers[TYPE_NAME] = app.translator.trans("xypp-store.forum.create-modal.providers.decoration");
  });
}
