<h1>体重登録</h1>

<form action="/weight_logs" method="POST">
    @csrf

    <div>
        <label>日付</label>
        <input type="date" name="date" value="{{ old('date') }}">
        @error('date')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>体重</label>
        <input type="text" name="weight" value="{{ old('weight') }}">
        @error('weight')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>摂取カロリー</label>
        <input type="text" name="calories" value="{{ old('calories') }}">
        @error('calories')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>運動時間</label>
        <input type="time" name="exercise_time" value="{{ old('exercise_time') }}">
        @error('exercise_time')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>運動内容</label>
        <textarea name="exercise_content">{{ old('exercise_content') }}</textarea>
        @error('exercise_content')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">登録</button>
</form>