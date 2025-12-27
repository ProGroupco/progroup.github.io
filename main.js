// Scene
const scene = new THREE.Scene();

// Camera
const camera = new THREE.PerspectiveCamera(
  75,
  window.innerWidth / window.innerHeight,
  0.1,
  1000
);
camera.position.z = 5;

// Renderer
const renderer = new THREE.WebGLRenderer({
  canvas: document.getElementById("bg"),
  antialias: true,
  alpha: true
});

renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
renderer.setSize(window.innerWidth, window.innerHeight);

// Geometry (3D object)
const geometry = new THREE.TorusKnotGeometry(1.2, 0.4, 120, 16);
const material = new THREE.MeshStandardMaterial({
  color: 0x4facfe,
  metalness: 0.7,
  roughness: 0.25
});

const object = new THREE.Mesh(geometry, material);
scene.add(object);

// Lights
const pointLight = new THREE.PointLight(0xffffff, 1.2);
pointLight.position.set(5, 5, 5);
scene.add(pointLight);

const ambientLight = new THREE.AmbientLight(0xffffff, 0.4);
scene.add(ambientLight);

// Animation loop
function animate() {
  requestAnimationFrame(animate);

  object.rotation.x += 0.003;
  object.rotation.y += 0.005;

  renderer.render(scene, camera);
}

animate();

// Resize support (mobile rotation & PC resize)
window.addEventListener("resize", () => {
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth, window.innerHeight);
});
