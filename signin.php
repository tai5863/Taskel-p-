<html>
    <head>
        <title>Taskhel(p)</title>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="header">
            <h1 class="tile">Taskhel(p)</h1>
        </div>
        <div class="message_container"><p>Taskel(p)は, タスク消化で困っている人々を助けるWebアプリケーションです。</p></div>
        <div class="container">
            <div class="signin">
                <h2>サインイン</h2>
                <form action="user.php" method="post">
                    <div id="auth_php"></div>
                    <table>
                        <tr>
                            <td>ユーザID</td>
                            <td><input type="number" name="user_id"></td>
                        </tr>
                        <tr>
                            <td>ユーザ名</td>
                            <td><input type="text" name="name"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input class="ac_signin" type="submit" name="submit" value="ログイン">
                            </td>
                        </tr>
                    </table>
                </form>
                <div class="to_signup"><a href="http://turkey.slis.tsukuba.ac.jp/~s1911396/signup.php">アカウントをお持ちでない場合はこちら</a></div>
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
    .message_container {
        height: 80px;
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
    .signin {
        position: relative;
    }
    .ac_signin {
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
