function disp_Dashboard() {
    var userless18 = 0,
    var user18_50 = 0, 
    var usergre50 = 0;
    for (var i = 0; i < userDataList.length; i++) {
        if (userDataList[i].Age < 18) {
            userless18++;
        }
        if (userDataList[i].Age > 18 && userDataList[i].Age < 50) {
            user18_50++;
        }
        if (userDataList[i].Age > 50) {
            usergre50++;
        }
    }
    console.log(user18_50);
    console.log(userless18);
    console.log(usergre50);
}