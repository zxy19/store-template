# Store-template

![License](https://img.shields.io/badge/license-MIT-blue.svg)

Template of store provider. This is not a plugin that can be install but used to create a new plugin for [xypp/store](https://github.com/zxy19/store)

## Store Item's life cycle

- requires mermaid

```mermaid
graph LR
	subgraph Store Item
		fre(Fronten Store Display)
		hlp(Purchase from helper)
		pc(provider\n->canPurchase)
         pp[provider\n->purchase]
		pc--Y-->fre
		fre--purchase-->pp
		hlp--purchase-->pp
	end
	subgraph Purchase History
		pp----Purchased
		Purchased
		pcuf(provider\n->canUseFrontend)
         pcu(provider\n->canUse)
   		frep(Fronten Purchased)
         Purchased---->pcuf--y-->pcu--y-->frep
         hlpu(Use from helper)
         use(Provider\n->useItem)
         frep--data-->use
         hlpu--data-->use
         expire(Provider\n->expire)
         Purchased--Timeout-->expire
         Purchased--Remove-->expire
	end
```

## Develop

### backend

Plugins could extend store by offering StoreProvider extends AbstractStoreProvider. See `StoreProvider.php`

### frontend

This project contains a file named `StoreHelper.ts`, which has described all methods the Store exports.
