window.addEventListener("DOMContentLoaded", (event) => {
    CometChatWidget.init({
        appID: cometchat_app_id,
        appRegion: cometchat_region,
        authKey: cometchat_auth_key,
    }).then(
        (response) => {
            console.log("Initialization completed successfully");
            //You can now call login function.
            CometChatWidget.login({
                uid: user_id,
            }).then(
                (response) => {
                    CometChatWidget.launch({
                        widgetID: cometchat_widget_id,
                        target: "#comet-chat-widget",
                        roundedCorners: "false",
                        height: "500px",
                        width: "200px",
                        defaultID: event_id, //default UID (user) or GUID (group) to show,
                        defaultType: "group", //user or group
                    });
                },
                (error) => {
                    console.log("User login failed with error:", error);
                    //Check the reason for error and take appropriate action.
                }
            );
        },
        (error) => {
            console.log("Initialization failed with error:", error);
            //Check the reason for error and take appropriate action.
        }
    );
});
