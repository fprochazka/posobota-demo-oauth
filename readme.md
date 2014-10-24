# Posobota OAuth demo

Create sandbox

- `composer require nette/sandbox demo`
- `cd demo`
- delete all the crap


## Facebook

- `composer require kdyby/facebook`
- [Create new app](https://developers.facebook.com/apps/)
- register extension

```yml
extensions:
	facebook: Kdyby\Facebook\DI\FacebookExtension
```

- copy credentials to config


```yml
facebook:
	appId: ""
	appSecret: ""
	permissions: [email, public_profile]
```

- copy [auth component usage from doc](https://github.com/Kdyby/Facebook/blob/master/docs/en/index.md#authentication)
- delete not needed code
- add button to template
- profit

