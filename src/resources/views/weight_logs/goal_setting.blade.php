<h1>目標体重設定</h1>

<form action="/weight_logs/goal_setting" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>目標体重</label>
        <input type="text" name="target_weight" value="{{ old('target_weight', $weightTarget->target_weight) }}">
    </div>

    <button type="submit">更新</button>
</form>

<a href="/weight_logs">戻る</a>