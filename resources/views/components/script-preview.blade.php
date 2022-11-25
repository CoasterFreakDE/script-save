<!-- Script Preview Component -->

@props(['id'])

<div class="shadow rounded-md p-4 max-w-sm w-full mx-auto" id="{{$id}}">
    <div class="animate-pulse flex space-x-4" name="script-thumbnail">
        <div class="rounded-3xl bg-secondary h-48 w-96"></div>
    </div>
    <div class="animate-pulse flex space-x-4" name="script-meta">
        <div name="script-details" class="flex-1 space-y-4 py-1">
            <div class="space-y-2 pl-3">
                <div name="script-title" class="h-4 bg-secondary rounded w-2/3"></div>
                <div name="script-description" class="h-4 bg-secondary rounded "></div>
            </div>
        </div>
        <div name="script-stats" class="flex-1 space-y-4 py-1">
            <div class="space-y-2 pr-3 flex flex-col place-self-end items-end content-end self-end place-content-end place-items-end">
                <div name="script-views" class="h-4 bg-secondary rounded w-3/4"></div>
                <div name="script-author" class="h-4 bg-secondary rounded w-1/2"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Script Preview Component -->
