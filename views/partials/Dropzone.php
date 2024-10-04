<div class="flex flex-col gap-3 text-[#ABB8C4]">
  <label for="id_document">Scanned Copy of Identification Document</label>
  <div class="preview">
    <img src="" alt="">
  </div>
  <div class="dropzone h-[150px] w-full bg-[#1A1D21] rounded-[8px] px-3 relative z-0">
    <input type="file" class="w-full h-[150px] opacity-0 cursor-pointer" name="id_document">
    <div class="absolute inset-0 -z-10 flex flex-col justify-center items-center gap-3 text-center">
      <div class="p-2 aspect-square rounded-full bg-[#2D3136]">
        <img src="<?= resolveAssetUrl("/upload.svg") ?>" alt="upload">
      </div>
      <div>
        <p><span class="text-[#24AE7C]">Click to upload</span> or drag and drop</p>
        <small>SVG, PNG, JPG or GIF (max. 800x400px)</small>
      </div>
    </div>
  </div>
</div>