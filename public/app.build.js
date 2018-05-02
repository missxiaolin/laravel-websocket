{
    "appDir": "./assets",
    "dir": "./build",
    "mainConfigFile": "./assets/js/lib/config.js",
    "paths": {
        "page.params": "empty:"
    },
    "baseUrl": "./js",
    "useStrict": true,
    "removeCombined": true,
    "findNestedDependencies": true,
    "optimizeCss": "standard",
    "waitSeconds": 0,
    "modules": [
        {
            "name": "../pages/home/detail",
            "include": [
                "jquery"
            ],
            "exclude": [
                "../js/lib/config"
            ]
        },
        {
            "name": "../pages/home/index",
            "include": [
                "jquery"
            ],
            "exclude": [
                "../js/lib/config"
            ]
        },
        {
            "name": "../pages/home/login",
            "include": [
                "jquery"
            ],
            "exclude": [
                "../js/lib/config"
            ]
        }
    ]
}