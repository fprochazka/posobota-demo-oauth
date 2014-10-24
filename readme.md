# Posobota OAuth demo

Create sandbox

- `composer require nette/sandbox demo`
- `cd demo`
- delete all the crap


## Facebook

- `composer require kdyby/facebook`
- register extension

```yml
extensions:
	facebook: Kdyby\Facebook\DI\FacebookExtension

facebook:
	permissions: [email, public_profile]
	graphVersion: v2.1
```

- [Create new app](https://developers.facebook.com/apps/494469227315105/test-apps/)
- copy credentials to config


```yml
facebook:
	appId: ""
	appSecret: ""
```

- copy [auth component usage from doc](https://github.com/Kdyby/Facebook/blob/master/docs/en/index.md#authentication)
- delete not needed code
- add button to template
- click the button
- doesnt work?
- fix the app url
- try again
- fix the [graph api version](https://github.com/fprochazka/posobota-demo-oauth/blob/master/www/images/fb-upgrade-notice.png), [revoke app from test user](https://www.facebook.com/settings?tab=applications)
- try again
- profit
- show api calls
- show identity in panel


## Github

- `composer require kdyby/github`
- register extension

```yml
extensions:
	github: Kdyby\Github\DI\GithubExtension

github:
	permissions: [user:email]
```

- [Create new app](https://github.com/settings/applications/new)
- copy credentials to config

```yml
github:
	appId: ""
	appSecret: ""
```

- copy [auth component usage from doc](https://github.com/Kdyby/Github/blob/master/docs/en/index.md#authentication)
- delete not needed code
- add button to template
- click the button
- profit
- show api calls
- show identity in panel
