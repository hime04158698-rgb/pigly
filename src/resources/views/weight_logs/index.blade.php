<h1>体重一覧</h1>

<form action="/logout" method="POST">
    @csrf
    <button type="submit">ログアウト</button>
</form>

@if($weightTarget)
    <p>目標体重：{{ $weightTarget->target_weight }}kg</p>
@endif


@if($latestWeight)
    <p>最新体重：{{ $latestWeight->weight }}kg</p>
@endif

@if($diff !== null)
    <p>目標まで：{{ $diff > 0 ? '+' : '' }}{{ $diff }}kg</p>
@endif

<form action="/weight_logs" method="GET">
    <div>
        <label>開始日</label>
        <input type="date" name="start_date" value="{{ request('start_date') }}">
    </div>

    <div>
        <label>終了日</label>
        <input type="date" name="end_date" value="{{ request('end_date') }}">
    </div>

    <button type="submit">検索</button>
</form>
@if(request('start_date') || request('end_date'))
    <p>
        検索条件：
        {{ request('start_date') ?: '指定なし' }}
        〜
        {{ request('end_date') ?: '指定なし' }}
    </p>
@endif

@foreach ($weightLogs as $log)
    <div>
        <p>{{ $log->date }}</p>
        <p>{{ $log->weight }} kg</p>

        <a href="/weight_logs/{{ $log->id }}/edit">編集</a>

        <form action="/weight_logs/{{ $log->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">削除</button>
        </form>
    </div>
@endforeach

<a href="/weight_logs/create">新規登録</a>
<a href="/weight_logs/goal_setting">目標体重設定</a>