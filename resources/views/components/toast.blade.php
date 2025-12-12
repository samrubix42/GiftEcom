<div
    x-data="{ show: false, message: '', type: 'success' }"
    x-on:toast.window="
        message = $event.detail.message;
        type = $event.detail.type ?? 'success';
        show = true;
        setTimeout(() => show = false, 3000);
    "
    x-show="show"
    x-transition
    :class="{
        'bg-green-600 text-white': type === 'success',
        'bg-red-600 text-white': type === 'error',
        'bg-yellow-500 text-black': type === 'warning',
        'bg-blue-600 text-white': type === 'info',
    }"
    class="fixed top-4 right-4 px-4 py-2 rounded shadow-lg min-w-[220px]">
    <span x-text="message"></span>
</div>