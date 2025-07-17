<!-- Modal Form Component -->
<div id="modalForm" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
    <button onclick="document.getElementById('modalForm').classList.add('hidden')" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
      &times;
    </button>
    <div id="modalFormContent">
      <!-- Form content will be injected here -->
    </div>
  </div>
</div>
<script>
  function openModalForm(contentHtml) {
    document.getElementById('modalFormContent').innerHTML = contentHtml;
    document.getElementById('modalForm').classList.remove('hidden');
  }
</script> 