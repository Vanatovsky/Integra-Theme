import * as THREE from 'three'
import { TWEEN } from 'three/examples/jsm/libs/tween.module.min'

let particles, particles_2

let animate_position_particles_1, animate_position_particles_2

export function createParticles(gui, textureLoader, settings, level_2_group, particleTexture, particleTexture_2) {

    const debugParticlesGroupe = gui.addFolder('Particles')

    debugParticlesGroupe.add(settings, "mode_high_rotation")



    // Geometry
    const particlesGeometry = new THREE.BufferGeometry()
    const count_1 = 120
    const positions = new Float32Array(count_1 * 3)

    for (let i = 0; i < count_1 * 3; i++) {
        // Position
        if (!(i % 3)) {
            positions[i] = (Math.random() - 0.5) * 12

        } else {
            if (!(i % 2)) {
                if (i % 3 !== 1) {
                    positions[i] = (Math.random() - 0.5) * 12
                } else {
                    positions[i] = (Math.random()) * 2.25
                }

            } else {
                positions[i] = (Math.random()) * 2.25
            }
        }

        //scale[i] = Math.random()

        // Color
        //colors_2[i] = 1
    }

    particlesGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3))


    // Material
    const particlesMaterial = new THREE.PointsMaterial()

    particlesMaterial.size = 0.06
    particlesMaterial.sizeAttenuation = true
    particlesMaterial.color = new THREE.Color(1, 1, 1)
    particlesMaterial.transparent = true
    particlesMaterial.opacity = 0.4
    particlesMaterial.alphaMap = particleTexture
    particlesMaterial.alphaTest = 0.01



    // Points
    particles = new THREE.Points(particlesGeometry, particlesMaterial)
    particles.position.y = -2
    level_2_group.add(particles)

    //particles.layers.enable(settings.layer_bloom_scene)



    // Geometry
    const particlesGeometry_2 = new THREE.BufferGeometry()
    const count_2 = 120
    const positions_2 = new Float32Array(count_2 * 3)
    const scale_2 = new Float32Array(count_2 * 3)
        //const colors_2 = new Float32Array(count_2 * 3)

    for (let i = 0; i < count_2 * 3; i++) {
        // Position
        if (!(i % 3)) {
            positions_2[i] = (Math.random() - 0.5) * 12

        } else {
            if (!(i % 2)) {
                if (i % 3 !== 1) {
                    positions_2[i] = (Math.random() - 0.5) * 12
                } else {
                    positions_2[i] = (Math.random()) * 2.25
                }

            } else {
                positions_2[i] = (Math.random()) * 2.25
            }
        }

        scale_2[i] = Math.random()

        // Color
        //colors_2[i] = 1
    }

    particlesGeometry_2.setAttribute('position', new THREE.BufferAttribute(positions_2, 3))


    // Material
    const particlesMaterial_2 = new THREE.PointsMaterial()

    particlesMaterial_2.size = 0.06
    particlesMaterial_2.sizeAttenuation = true
    particlesMaterial_2.color = new THREE.Color(1, 1, 1)
    particlesMaterial_2.transparent = true
    particlesMaterial_2.opacity = 0.4
    particlesMaterial_2.alphaMap = particleTexture_2
    particlesMaterial_2.alphaTest = 0.01


    // Points
    particles_2 = new THREE.Points(particlesGeometry_2, particlesMaterial_2)
    particles_2.position.y = -1
    level_2_group.add(particles_2)


}


export function updateParticles(settings) {
    //Particles Position
    particles.rotation.y += 0.002
    particles_2.rotation.y += 0.007
}

export function particlesGoToLevel3() {

    if (animate_position_particles_1 !== undefined) {
        animate_position_particles_1.stop()
    }
    animate_position_particles_1 = new TWEEN.Tween(particles.position).to({ y: -20 }, 2000).easing(TWEEN.Easing.Quadratic.Out).start()

    if (animate_position_particles_2 !== undefined) {
        animate_position_particles_2.stop()
    }
    animate_position_particles_2 = new TWEEN.Tween(particles_2.position).to({ y: -20 }, 2000).easing(TWEEN.Easing.Quadratic.Out).start()

}

export function particlesGoToLevel2() {

    if (animate_position_particles_1 !== undefined) {
        animate_position_particles_1.stop()
    }
    animate_position_particles_1 = new TWEEN.Tween(particles.position).to({ y: -2 }, 2000).easing(TWEEN.Easing.Quadratic.Out).start()

    if (animate_position_particles_2 !== undefined) {
        animate_position_particles_2.stop()
    }
    animate_position_particles_2 = new TWEEN.Tween(particles_2.position).to({ y: -2 }, 2000).easing(TWEEN.Easing.Quadratic.Out).start()


}