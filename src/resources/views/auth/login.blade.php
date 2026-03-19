<h1>ログイン</h1>

<form action="/login" method="POST">
    @csrf

    <div>
        <label>メールアドレス</label>
        <input type="email" name="email">
    </div>

    <div>
        <label>パスワード</label>
        <input type="password" name="password">
    </div>

    <button type="submit">ログイン</button>
</form>

<a href="/register">会員登録はこちら</a>