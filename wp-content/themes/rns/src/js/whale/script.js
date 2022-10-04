//import './style.scss'
import * as THREE from "three";
import * as dat from "dat.gui";
import { GLTFLoader } from "three/examples/jsm/loaders/GLTFLoader";
import { FontLoader } from "three/examples/jsm/loaders/FontLoader";
import { TWEEN } from "three/examples/jsm/libs/tween.module.min";
import { TW } from "./inc/extra_functions";
import { Settings } from "./settings/main_settings";
import {
  createWater,
  createSky,
  createMainDecoration,
  cristalColorAnimateOn,
  cristalColorAnimationOff,
  updateSun,
} from "./main_scene/main_elements";
import {
  goToLevel1,
  goToLevel2,
  goToLevel3,
  hoverOnUslugaLevel3,
  hoverOutUslugaLevel3,
} from "./levels_animations/levels_animations";
import {
  createLevel2Texts,
  raycasterListenerTextesLevel2,
  openLevel2Page,
  closeLevel2Page,
} from "./levels/level2";
import { createParticles, updateParticles } from "./main_scene/particles";
import { createPointCursor, modeCursorLevel1 } from "./main_scene/cursor";
import { createWhale } from "./main_scene/whale";
import { createMainLights } from "./main_scene/main_lights";
import { EffectComposer } from "three/examples/jsm/postprocessing/EffectComposer.js";
import { RenderPass } from "three/examples/jsm/postprocessing/RenderPass.js";
import { UnrealBloomPass } from "three/examples/jsm/postprocessing/UnrealBloomPass.js";
import { ShaderPass } from "three/examples/jsm/postprocessing/ShaderPass.js";
import { FXAAShader } from "three/examples/jsm/shaders/FXAAShader.js";
import Stats from "three/examples/jsm/libs/stats.module.js";
import { firstAnimationWhaleAndCamera } from "./levels_animations/levels_animations";
import { $ } from "spritespin/release/src/utils";

let mouseX, mouseY;
let mouse_ray = new THREE.Vector2();

const darkMaterial = new THREE.MeshBasicMaterial({ color: "black" });
const materials_for_bloom = {};

let composer, mixer;
let main_scene_decoration,
  whale_mesh,
  whale_mesh_level3,
  animations,
  whale_model,
  whale_gltf,
  level_2_text_group,
  text_font;

let pointCursorGroup, pointCursorGroup_level3;

let water;

let activeCursorAnimation = false;

let level_2_group = new THREE.Group();

let prevTime = Date.now();

pointCursorGroup = new THREE.Group();
pointCursorGroup.position.set(0, 0, 0);
pointCursorGroup_level3 = new THREE.Group();
pointCursorGroup.name = "cursor_group";

let text_objs_for_raycaster = [];

const sizes = {
  width: window.innerWidth,
  height: window.innerHeight,
};

let windowHalfX = sizes.width / 2;
let windowHalfY = sizes.height / 2;

// Debug bug
const gui = new dat.GUI();
const settings = Settings;
//gui.open()
gui.hide();

// Raycaster
const raycaster = new THREE.Raycaster();

/**
 * Change settings for mobile devices
 */
if (window.innerWidth <= 960) {
  //mobile trigger
  settings.mobile_version = true;

  //camera
  settings.camera_position_z = 6;
  settings.camera_position_level_2_z = 6;
  settings.camera_position_level_3_z = 6;

  //texts
  settings.text_position_x = -2.04;
  settings.text_position_y = 0.93;

  settings.text_2_position_x = -1.5;

  settings.text_3_position_x = -0.1;
  settings.text_3_position_y = 1.5;

  settings.text_4_position_x = -0.06;
  settings.text_4_position_y = -0.89;

  settings.text_5_position_x = -0.9;
  settings.text_5_position_y = 1.57;
}

/**
 * Base
 */

// Canvas
const canvas = document.querySelector("canvas.webgl");
const container = document.getElementById("rf_integra_main_whale_box");

// Scene
const scene = new THREE.Scene();

/**
 * Camera
 */
// Base camera
const camera = new THREE.PerspectiveCamera(
  75,
  sizes.width / sizes.height,
  0.1,
  30
);
camera.name = "camera1";
camera.position.set(settings.camera_position_x, 0, -10);
scene.add(camera);

// TW(camera.position, { y: 0 }, 3000, TWEEN.Easing.Back.InOut, () => {
//     settings.first_scene_show = 1
//     settings.active_level = 2
// }, 3000)

const cameraDebugFolder = gui.addFolder("Camera");
cameraDebugFolder
  .add(settings, "camera_position_x")
  .min(-100)
  .max(100)
  .step(0.01)
  .onChange(() => {
    camera.position.x = settings.camera_position_x;
  });
cameraDebugFolder
  .add(settings, "camera_position_y")
  .min(-100)
  .max(100)
  .step(0.01)
  .onChange(() => {
    camera.position.y = settings.camera_position_y;
  });
cameraDebugFolder
  .add(settings, "camera_position_z")
  .min(-100)
  .max(100)
  .step(0.01)
  .onChange(() => {
    camera.position.z = settings.camera_position_z;
  });

/**
 * Renderer
 */
const renderer = new THREE.WebGLRenderer({
  canvas: canvas,
  antialias: true,
  //background: 0x00ffff,
  //alpha: true,
  toneMapping: THREE.ReinhardToneMapping,
});
renderer.setSize(sizes.width, sizes.height);
renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
renderer.autoClear = false;
renderer.shadowMap.type = THREE.PCFSoftShadowMap;

const renderScene = new RenderPass(scene, camera);

// const bloomPass = new UnrealBloomPass(new THREE.Vector2(sizes.width, sizes.height), 1.5, 0.0, 0.75)
// bloomPass.threshold = settings.bloomThreshold
// bloomPass.strength = settings.bloomStrength
// bloomPass.radius = settings.bloomRadius

// const fxaaPass = new ShaderPass(FXAAShader)
// const pixelRatio = renderer.getPixelRatio()
// fxaaPass.material.uniforms['resolution'].value.x = 1 / (sizes.width * pixelRatio)
// fxaaPass.material.uniforms['resolution'].value.y = 1 / (sizes.height * pixelRatio)

// const bloomComposer = new EffectComposer(renderer)
// bloomComposer.renderToScreen = false
// bloomComposer.addPass(renderScene)
// bloomComposer.addPass(bloomPass)
//bloomComposer.addPass(fxaaPass)

// composer = new EffectComposer(renderer)
// composer.addPass(renderScene)

// const finalPass = new ShaderPass(
//     new THREE.ShaderMaterial({
//         uniforms: {
//             baseTexture: { value: null },
//             bloomTexture: { value: bloomComposer.renderTarget2.texture }
//         },
//         vertexShader: document.getElementById('vertexshader').textContent,
//         fragmentShader: document.getElementById('fragmentshader').textContent,
//         defines: {}
//     }), 'baseTexture'
// )

//finalPass.needsSwap = true

const finalComposer = new EffectComposer(renderer);

finalComposer.addPass(renderScene);
//finalComposer.addPass(bloomPass)
// finalComposer.addPass(fxaaPass)

// composer.addPass(bloomPass);

window.addEventListener("resize", () => {
  // Update sizes
  sizes.width = window.innerWidth;
  sizes.height = window.innerHeight;

  // Update camera
  camera.aspect = sizes.width / sizes.height;
  camera.updateProjectionMatrix();

  // Update renderer
  renderer.setSize(sizes.width, sizes.height);
  renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

  composer.setSize(sizes.width, sizes.height);
});

const init = () => {
  /**
   * Clicks in menu
   */
  const link_service_for_main_page = document.querySelector(
    'a[href*="/#services"]'
  );
  link_service_for_main_page.addEventListener("click", function () {
    const modal_overlay = document.querySelector(
      "#modal_main_menu + .modal-overlay"
    );
    modal_overlay.click();
    goToLevel3(
      settings,
      camera,
      scene,
      whale_model,
      pointCursorGroup,
      mixer,
      animations
    );
  });

  const link_contacts_for_main_page = document.querySelector(
    'a[href*="/#contacts"]'
  );
  link_contacts_for_main_page.addEventListener("click", function () {
    const modal_overlay = document.querySelector(
      "#modal_main_menu + .modal-overlay"
    );
    modal_overlay.click();
    goToLevel1(
      settings,
      scene,
      camera,
      whale_model,
      whale_mesh,
      level_2_group,
      mixer,
      animations,
      pointCursorGroup
    );
  });

  //   const link_contacts_for_main_page = document.querySelector(
  //     'a[href*="/#contacts"]'
  //   );

  //   link_contacts_for_main_page.addEventListener("click", function () {
  //     const modal_overlay = document.querySelector(
  //       "#modal_main_menu + .modal-overlay"
  //     );
  //     modal_overlay.click();
  //     goToLevel1(
  //       settings,
  //       scene,
  //       camera,
  //       whale_model,
  //       whale_mesh,
  //       level_2_group,
  //       mixer,
  //       animations,
  //       poin
  //     );
  //   });

  //stats = new Stats()
  //document.querySelector('body').appendChild(stats.dom)

  // Events
  document.addEventListener("mousemove", onDocumentMouseMove);

  scene.add(level_2_group);

  //Fog
  scene.fog = new THREE.Fog(settings.fog_color, 0.2, settings.scene_fog_far);

  const fog_debug = gui.addFolder("Fog");

  fog_debug.addColor(settings, "fog_color").onChange(() => {
    scene.fog.color.set(settings.fog_color);
  });

  /**
   * Lights
   */
  createMainLights(gui, scene);

  /**
   * Create Water - Sky - Sun
   */
  water = createWater();
  //water.rotation.y = Math.PI

  scene.add(water);
  createSky(settings, scene, renderer, water);
  createLevel2Texts(gui, settings, text_font, level_2_group, pointCursorGroup);

  /**
   * Main Decoration
   */
  createMainDecoration(
    gui,
    settings,
    scene,
    main_scene_decoration,
    backgroundContactsTexture,
    big4Kcolor,
    big4Knormal
  );

  /**
   * Whale
   */
  createWhale(
    settings,
    mixer,
    animations,
    scene,
    level_2_group,
    whale_gltf,
    whale_model,
    whale_mesh,
    whaleNormalTexture,
    whaleColorTexture
  );

  /**
   * Particles
   */
  createParticles(
    gui,
    textureLoader,
    settings,
    level_2_group,
    particleTexture,
    particleTexture_2
  );

  /**
   * Point Cursor
   */
  createPointCursor(gui, settings, pointCursorGroup, level_2_group);

  /**
   * First Animation
   */
  switch (document.location.hash) {
    case "#services":
      goToLevel3(
        settings,
        camera,
        scene,
        whale_model,
        pointCursorGroup,
        mixer,
        animations
      );
      break;
    case "#contacts":
      goToLevel1(
        settings,
        scene,
        camera,
        whale_model,
        whale_mesh,
        level_2_group,
        mixer,
        animations,
        pointCursorGroup
      );
      break;
    default:
      firstAnimationWhaleAndCamera(
        settings,
        whale_model,
        scene,
        mixer,
        animations
      );
      break;
  }

  //Animation
  tick();
};

/**
 * Loading assets
 */
const loaderManager = new THREE.LoadingManager(
  // loaded
  () => {
    init();
  },

  // Process
  (itemUrl, itemsLoaded, itemsTotal) => {
    // console.log('itemsTotal', itemsTotal)
    // console.log('itemsLoaded', itemsLoaded)
    // console.log('itemUrl', itemUrl)
  }
);

const gltfLoader = new GLTFLoader(loaderManager);
const textureLoader = new THREE.TextureLoader(loaderManager);

gltfLoader.load("/wp-content/themes/rns/assets/models/whale.glb", (gltf) => {
  whale_model = gltf.scene;
  whale_gltf = gltf;
  whale_model.traverse(function (object) {
    if (object.isMesh) {
      whale_mesh = object;
      // console.log('whale_mesh_layers before', whale_mesh.layers)
      // whale_mesh.layers.toggle(settings.layer_bloom_scene)
      // console.log('whale_mesh_layers after', whale_mesh.layers)
    }
  });
  mixer = new THREE.AnimationMixer(whale_model);
  animations = gltf.animations;
});

gltfLoader.load("/wp-content/themes/rns/assets/models/rocks.glb", (gltf) => {
  main_scene_decoration = gltf.scene;
});

const whaleNormalTexture = textureLoader.load(
  "/wp-content/themes/rns/assets/textures/whale/whale-the-best7_DefaultMaterial_Normal.jpg"
);
const whaleColorTexture = textureLoader.load(
  "/wp-content/themes/rns/assets/textures/whale/whale-the-best7_DefaultMaterial_BaseColor.jpg"
);

const big4Kcolor = textureLoader.load(
  "/wp-content/themes/rns/assets/textures/whale/whale-the-best7_DefaultMaterial_BaseColor.jpg"
);
big4Kcolor.flipY = false;

const big4Knormal = textureLoader.load(
  "/wp-content/themes/rns/assets/textures/whale/whale-the-best7_DefaultMaterial_Normal.jpg"
);
big4Knormal.flipY = false;

const backgroundContactsTexture = textureLoader.load(
  "/wp-content/themes/rns/assets/textures/vid2.jpg"
);

whaleNormalTexture.flipY = false;
whaleColorTexture.flipY = false;

whaleColorTexture.encoding = THREE.sRGBEncoding;

const fontLoader = new FontLoader(loaderManager);
fontLoader.load("/wp-content/themes/rns/assets/fonts/intro.json", (font) => {
  text_font = font;
});

const particleTexture = textureLoader.load(
  "/wp-content/themes/rns/assets/textures/particles/3.png"
);
const particleTexture_2 = textureLoader.load(
  "/wp-content/themes/rns/assets/textures/particles/102.png"
);

/**
 * Tick Function
 */
const clock = new THREE.Clock();

const tick = () => {
  // Update controls
  //controls.update()

  const elapsedTime = clock.getElapsedTime();
  const time = Date.now();

  if (mixer) {
    mixer.update((time - prevTime) * 0.001);
    prevTime = time;
  }

  //Particles Position
  updateParticles(settings);

  // Cast a ray
  raycaster.setFromCamera(mouse_ray, camera);

  if (settings.active_level == 1) {
    modeCursorLevel1(elapsedTime, camera, pointCursorGroup);

    // settings.sun_elevation += Math.sin(elapsedTime / 5) / 100

    // updateSun(settings, scene)
  }

  if (settings.active_level == 2) {
    if (settings.camera_look_at_center) {
      camera.lookAt(0, camera.position.y, 0);

      if (mouseX !== undefined || mouseY !== undefined) {
        camera.position.x = settings.camera_position_level_2_x + mouseX / 3000;
        camera.position.y = settings.camera_position_level_2_y + mouseY / 10000;
      }
    }
  }

  if (settings.active_level == 3) {
    if (settings.cristal_animate_up) {
      cristalColorAnimateOn(settings);
    }

    if (settings.cristal_animate_down) {
      cristalColorAnimationOff(settings);
    }

    if (settings.animate_hover_cursor_level_3) {
    }

    pointCursorGroup.position.y =
      settings.cursor_level_3_position_y + Math.sin(elapsedTime * 3) / 4;
    pointCursorGroup.position.x =
      settings.cursor_level_3_position_x + Math.cos(elapsedTime * 3) / 4;

    if (mouseX !== undefined || mouseY !== undefined) {
      camera.position.x = settings.camera_position_level_3_x + mouseX / 10000;
      camera.position.y = settings.camera_position_level_3_y + mouseY / 10000;
    }

    camera.lookAt(0, camera.position.y, 0);
  }

  raycasterListenerTextesLevel2(
    settings,
    scene,
    camera,
    raycaster,
    pointCursorGroup,
    level_2_group
  );

  water.material.uniforms["time"].value += 1.0 / 160.0;

  TWEEN.update();

  //stats.update()

  // Render
  //renderer.render(scene, camera)
  //composer.render()
  render();

  // Call tick again on the next frame
  window.requestAnimationFrame(tick);
};

//tick()

function render() {
  finalComposer.render();

  // scene.traverse(darkenNonBloomed)
  // bloomComposer.render()
  // scene.traverse(restoreMaterial)
}

// function disposeMaterial(obj) {

//     if (obj.material) {

//         obj.material.dispose();

//     }

// }

// function darkenNonBloomed(obj) {

//     if (obj.isMesh && bloomLayer.test(obj.layers) === false) {

//         materials_for_bloom[obj.uuid] = obj.material;
//         obj.material = darkMaterial;
//         //obj.material.visible = false
//     }

// }

// function restoreMaterial(obj) {

//     if (materials_for_bloom[obj.uuid]) {

//         obj.material = materials_for_bloom[obj.uuid];
//         delete materials_for_bloom[obj.uuid];

//     }

// }

/**
 * Level changes animations
 */

// Level 1
document.querySelector("#button_to_level_1").addEventListener("click", () => {
  goToLevel1(
    settings,
    scene,
    camera,
    whale_model,
    whale_mesh,
    level_2_group,
    mixer,
    animations,
    pointCursorGroup
  );
});

// Level 2
document.querySelector("#button_to_level_2").addEventListener("click", () => {
  goToLevel2(
    settings,
    camera,
    scene,
    mixer,
    animations,
    whale_model,
    level_2_group,
    whale_mesh,
    pointCursorGroup
  );
});

// Level 3
document.querySelector("#button_to_level_3").addEventListener("click", () => {
  goToLevel3(
    settings,
    camera,
    scene,
    whale_model,
    pointCursorGroup,
    mixer,
    animations
  );
});
document
  .querySelector(".listing_uslug_level_3")
  .addEventListener("mouseover", () => {
    hoverOnUslugaLevel3(settings, whale_model, pointCursorGroup);
  });
document
  .querySelector(".listing_uslug_level_3")
  .addEventListener("mouseout", () => {
    hoverOutUslugaLevel3(settings, whale_model, pointCursorGroup);
  });

const close_btns = document.querySelectorAll(
  ".pages_level_2 .rf_item .rf_close_item"
);

for (let cl_btn of close_btns) {
  cl_btn.addEventListener("click", () => {
    closeLevel2Page(settings, camera, scene, level_2_group);
  });
}

const close_contacts_buttons = document.querySelector(
  ".rf_whale_level_1_modal_contacts .rf_close_item"
);
close_contacts_buttons.addEventListener("click", () => {
  goToLevel2(
    settings,
    camera,
    scene,
    mixer,
    animations,
    whale_model,
    level_2_group,
    whale_mesh,
    pointCursorGroup
  );
  let modal_contacts = document.querySelector(
    ".rf_whale_level_1_modal_contacts"
  );
  modal_contacts.classList.remove("open");
  document.querySelector("#bottom_buttons_whale").classList.remove("close");
});

const close_services_button = document.querySelector(
  ".listing_uslug_level_3 .rf_close_item"
);
close_services_button.addEventListener("click", () => {
  goToLevel2(
    settings,
    camera,
    scene,
    mixer,
    animations,
    whale_model,
    level_2_group,
    whale_mesh,
    pointCursorGroup
  );
});

function onDocumentMouseMove(event) {
  mouseX = event.clientX - windowHalfX;
  mouseY = event.clientY - windowHalfY;
  mouse_ray.x = (event.clientX / sizes.width) * 2 - 1;
  mouse_ray.y = -((event.clientY / sizes.height) * 2 - 1);
}
