<div>
    <h1>Students components</h1>
    @foreach ($students as $stu)
        <livewire:student-list :name="$stu" />
    @endforeach
</div>
