<h1>会員登録</h1>

<form action="/register" method="POST">
    @csrf

    <div>
        <label>名前</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>メールアドレス</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>パスワード</label>
        <input type="password" name="password">
        @error('password')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>パスワード確認</label>
        <input type="password" name="password_confirmation">
    </div>

    <button type="submit">登録</button>
</form>

<a href="/login">ログインはこちら</a>