// import "./css/master.css";

import * as THREE from 'three';
			
import { OrbitControls } from './jsm/controls/OrbitControls.js';
import { GLTFLoader } from './jsm/loaders/GLTFLoader.js';
import { RGBELoader } from './jsm/loaders/RGBELoader.js';




const scene = new THREE.Scene();

const camera = new THREE.PerspectiveCamera(
75,
window.innerWidth / window.innerHeight,
0.1,
1000
);

const renderer = new THREE.WebGLRenderer({
canvas: document.querySelector("#canvas"),
antialias: false,alpha:true
});

renderer.setClearColor(0xfca311, 0);
renderer.setPixelRatio(window.devicePixelRatio);
renderer.toneMapping=THREE.ACESFilmicToneMapping;
renderer.toneMappingExposure=1.5;
renderer.setSize(window.innerWidth / 1.2, window.innerHeight / 1.2);
camera.position.setZ(30);
//Load background texture
// const bgloader = new THREE.TextureLoader();
// bgloader.load('https://images.pexels.com/photos/1205301/pexels-photo-1205301.jpeg' , function(texture)
//     {
//         scene.background = texture;  
//     });

renderer.render(scene, camera);

const geometry = new THREE.TorusGeometry(10, 3, 16, 100);
const material = new THREE.MeshStandardMaterial({ color: 0x14213d });
const torus = new THREE.Mesh(geometry, material);
// scene.add(torus);

const pointLight0 = new THREE.PointLight(0x404040, 2);
pointLight0.position.set(-10, 30, 10);
const pointLight1 = new THREE.PointLight(0x404040, 2);
pointLight1.position.set(20, 10, 20);
const pointLight2 = new THREE.PointLight(0x404040, 2);
pointLight2.position.set(0, -10, -20);
const ambientLight = new THREE.AmbientLight(0x404040, 10);
scene.add(pointLight0, pointLight1, pointLight2, ambientLight);

// const lightHelper0 = new THREE.PointLightHelper(pointLight0);
// const lightHelper1 = new THREE.PointLightHelper(pointLight1);
// const lightHelper2 = new THREE.PointLightHelper(pointLight2);
// scene.add(lightHelper0, lightHelper1, lightHelper2);

const loader = new GLTFLoader().setPath("./GFX/models/");
loader.load("showcase5.gltf", function (object) {
let s = 120;
object.scene.scale.set(s, s, s);
object.scene.position.set(0, -3, 0);
scene.add(object.scene);
});

const controls = new OrbitControls(camera, renderer.domElement);
controls.enableZoom = false;
controls.autoRotate = true;
controls.enablePan = false;



function animate() {
controls.update();
requestAnimationFrame(animate);
renderer.render(scene, camera);
}

animate();


window.addEventListener( 'resize', onWindowResize );

function onWindowResize() {
camera.aspect = window.innerWidth / window.innerHeight;
camera.updateProjectionMatrix();
renderer.setSize(window.innerWidth / 1.2, window.innerHeight / 1.2);
animate();
}
