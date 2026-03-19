<h1>体重編集</h1>

<form action="/weight_logs/{{ $weightLog->id }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>日付</label>
        <input type="date" name="date" value="{{ old('date', $weightLog->date) }}">
        @error('date')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>体重</label>
        <input type="text" name="weight" value="{{ old('weight', $weightLog->weight) }}">
        @error('weight')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>摂取カロリー</label>
        <input type="text" name="calories" value="{{ old('calories', $weightLog->calories) }}">
        @error('calories')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>運動時間</label>
        <input type="time" name="exercise_time" value="{{ old('exercise_time', $weightLog->exercise_time) }}">
        @error('exercise_time')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>運動内容</label>
        <textarea name="exercise_content">{{ old('exercise_content', $weightLog->exercise_content) }}</textarea>
        @error('exercise_content')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">更新</button>
</form>

<a href="/weight_logs">戻る</a>