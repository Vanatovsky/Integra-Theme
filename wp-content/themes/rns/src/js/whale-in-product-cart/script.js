//import './style.scss'
import * as THREE from "three";
import * as dat from "dat.gui";
import { GLTFLoader } from "three/examples/jsm/loaders/GLTFLoader";
import { Settings } from "./settings/main_settings";
import { RenderPass } from "three/examples/jsm/postprocessing/RenderPass.js";
import { Vector3 } from "three";

let mouseX, mouseY;
let mouse_ray = new THREE.Vector2();

let whale_mesh,
  whale_mesh_2,
  whale_model,
  whale_model_2,
  whale_gltf,
  animations;

let composer, mixer;

let prevTime = Date.now();

let text_objs_for_raycaster = [];

const box_canvas = document.querySelector(".rf_box_with_whale_white");

const sizes = {
  width: box_canvas.clientWidth / 2,
  height: 250,
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
}

/**
 * Base
 */

// Canvas
const canvas = document.querySelector("canvas.whale_product_webgl");
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
camera.position.set(0, 0, 1.7);
scene.add(camera);

// const cameraDebugFolder = gui.addFolder('Camera')
// cameraDebugFolder.add(settings, "camera_position_x").min(-100).max(100).step(0.01).onChange(() => { camera.position.x = settings.camera_position_x })
// cameraDebugFolder.add(settings, "camera_position_y").min(-100).max(100).step(0.01).onChange(() => { camera.position.y = settings.camera_position_y })
// cameraDebugFolder.add(settings, "camera_position_z").min(-100).max(100).step(0.01).onChange(() => { camera.position.z = settings.camera_position_z })

/**
 * Renderer
 */
const renderer = new THREE.WebGLRenderer({
  canvas: canvas,
  antialias: true,
  //background: 0x00ffff,
  alpha: true,
  toneMapping: THREE.ReinhardToneMapping,
});
renderer.setSize(sizes.width, sizes.height);
renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
renderer.autoClear = false;
renderer.shadowMap.type = THREE.PCFSoftShadowMap;

const renderScene = new RenderPass(scene, camera);

window.addEventListener("resize", () => {
  // Update sizes
  sizes.width = document.querySelector(".rf_box_with_whale_white").width;
  sizes.height = 250;

  // Update camera
  camera.aspect = sizes.width / sizes.height;
  camera.updateProjectionMatrix();

  // Update renderer
  renderer.setSize(sizes.width, sizes.height);
  renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

  composer.setSize(sizes.width, sizes.height);
});

const init = () => {
  // Events
  document.addEventListener("mousemove", onDocumentMouseMove);

  /**
   * Lights
   */

  const light = new THREE.AmbientLight(0xffffff); // soft white light
  scene.add(light);

  /**
   * Create White Whale
   */
  // Whale
  const whale_material = new THREE.MeshStandardMaterial({
    metalness: 0,
    roughness: 1,
    wireframe: true,
    color: 0xffffff,
  });

  const whale_material_2 = new THREE.MeshStandardMaterial({
    color: 0x0289d7,
  });

  whale_mesh.material = whale_material;
  whale_model.rotation.y = Math.PI / 2.05;
  whale_model.position.x = -0.3;
  scene.add(whale_model);

  const whale_mesh_2 = whale_model_2.children[0].children[2];
  // whale_mesh_2.scale.set(new Vector3(1.9, 1.9, 1.9));
  console.log(whale_mesh_2);
  whale_mesh_2.material = whale_material_2;
  scene.add(whale_model_2);

  /**
   * Whale sceleton animations
   */
  mixer.clipAction(animations[1]).stop();
  mixer.clipAction(animations[0]).play();

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
// const textureLoader = new THREE.TextureLoader(loaderManager)

gltfLoader.load("/wp-content/themes/rns/assets/models/whale.glb", (gltf) => {
  whale_model = gltf.scene;
  whale_model_2 = gltf.scene.clone();
  whale_gltf = gltf;
  whale_model.traverse(function (object) {
    if (object.isMesh) {
      whale_mesh = object;
    }
  });
  mixer = new THREE.AnimationMixer(whale_model);
  animations = gltf.animations;
});

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

  //controls.update();

  renderer.render(scene, camera);

  window.requestAnimationFrame(tick);
};

//tick()

function onDocumentMouseMove(event) {
  mouseX = event.clientX - windowHalfX;
  mouseY = event.clientY - windowHalfY;
  mouse_ray.x = (event.clientX / sizes.width) * 2 - 1;
  mouse_ray.y = -((event.clientY / sizes.height) * 2 - 1);
}
