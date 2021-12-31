module.exports = {
    settings: {},
    projects: [
        ".resources/js/",
        {
            root: ".resources/js/",
            package: ".package.json",
            globalComponents: [".resources/js/Shared/**/*.vue"],
        },
    ],
};
