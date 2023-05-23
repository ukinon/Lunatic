<div class="flex justify-center items-center min-h-screen">
    <div class="p-3 flex flex-row bg-slate-50 rounded-lg shadow-lg font-thin">
        <div class="flex flex-col gap-2 text-zinc-800 text-lg">
            <p> Name: <?= $data->name ?></p>
            <p> Address: <?= $data->address ?></p>
            <p> Birth Date: <?= $data->birth_date ?></p>
            <p> Joined: <?= $data->created_at ?></p>
        </div>
    </div>
</div>