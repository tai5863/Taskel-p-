<html>
    <head>
        <title>Taskhel(p)</title>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="header">
            <h1 class="tile">Taskhel(p)</h1>
        </div>
        <div class="container">
            <div class="signup">
                <h2>サインアップ</h2>
                <form action="regist_user.php" method="post">
                    <div id="auth_php"></div>
                    <table>
                        <tr>
                            <td>ユーザ名</td>
                            <td><input type="text" name="name"></td>
                        </tr>
                        <tr>
                            <td>性別</td>
                            <td>
                                <select type="number" name="sex">
                                    <option value="0">男性</option>
                                    <option value="1">女性</option>
                                    <option value="2">その他</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>メールアドレス</td>
                            <td><input type="text" name="email"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input class="ac_signup" type="submit" name="submit" value="登録">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>

<style>
    body {
        margin: 0;
        background-color: rgb(240, 240, 240);
        color: black;
        font-family: 'Noto Sans JP', sans-serif;
    }
    .header{
        height: 30%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .tile {
        font-size: 120px;
    }
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .signup {
        position: relative;
    }
    .ac_signup {
        margin: 10px 0;
        font-size: 15px;
        font-weight: 800;
        border: none;
        color: rgb(40, 40, 40);
        background-color: rgb(219, 173, 86);
        border-radius: 3px;
        padding: 3px;
        cursor: pointer;
    }
</style>
