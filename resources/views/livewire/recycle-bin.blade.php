<div>
    <label>
        Model
        <select wire:model="selectedModel" class="form-control">
            <option value="">Auswählen</option>
            @foreach($recycleModels as $model)
                <option value="{{ $model }}">{{ $model }}</option>
            @endforeach
        </select>
    </label>

    <div class="table-responsive">
        <table class="table align-middle table-row-dashed fs-6 gy-5">
            <thead class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
            <tr>
                <th>Id</th>
                <th>Gelöscht am</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            @forelse($trashedItems as $trashedItem)
                <tr>
                    <td>{{ $trashedItem->getKey() }}</td>
                    <td>{{ $trashedItem->deleted_at }}</td>
                    <td>
                        <button class="btn btn-primary" wire:click="restore('{{ $trashedItem->getKey() }}')">Wiederherstellen</button>
                        <button class="btn btn-danger" wire:click="forceDelete('{{ $trashedItem->getKey() }}')">Löschen</button>
                    </td>
                </tr>
            @empty
                @if($selectedModel)
                    <tr>
                        <td colspan="4">Keine gelöschten Einträge vorhanden</td>
                    </tr>
                @else
                    <tr>
                        <td colspan="4">Zuerst ein Model auswählen</td>
                    </tr>
                @endif
            @endforelse
            </tbody>
            {!! $trashedItems->links() !!}
        </table>
    </div>

</div>
