module.exports = {
    settings: {
        "vetur.useWorkspaceDependencies": true,
        "vetur.experimental.templateInterpolationService": true,
    },
    projects: [
        ".resources/js/",
        {
            root: ".resources/js/",
            package: ".package.json",
            globalComponents: [".resources/js/Shared/**/*.vue"],
        },
    ],
};
