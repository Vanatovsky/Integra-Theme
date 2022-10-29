class CloneController {
  cloneAny(obj) {
    let ret = {};
    Object.getOwnPropertyNames(obj).forEach((pn) => {
      ret[pn] = obj[pn];
    });
    return ret;
  }
}
export default new CloneController();

// public cloneObject3D(obj: THREE.Object3D, parent: THREE.Object3D): THREE.Object3D {
//     let ret: THREE.Object3D = null;
//     switch(obj.type) {
//         case "Group": ret = new THREE.Group(); break;
//         case "SkinnedMesh": ret = this.cloneSkinnedMesh(obj as THREE.SkinnedMesh, parent); break;
//         case "Bone": ret = (obj as THREE.Bone).clone(); break;
//         default: console.log('Unknown Clone Type: ' + obj.type); ret = new THREE.Object3D();
//     }
//     obj.children.forEach((c,i) => {
//         ret.add(this.cloneObject3D(c,ret));
//     });
//     if (obj["ID"]) { ret["ID"] = obj["ID"]; }
//     ret.name = obj.name;
//     ret.position.set(obj.position.x,obj.position.y,obj.position.z);
//     ret.rotation.set(obj.rotation.x,obj.rotation.y,obj.rotation.z);
//     ret.scale.set(obj.scale.x, obj.scale.y,obj.scale.z);
//     ret.quaternion.set(obj.quaternion.x,obj.quaternion.y,obj.quaternion.z,obj.quaternion.w);
//     ret.matrixWorldNeedsUpdate = obj.matrixWorldNeedsUpdate;
//     ret.userData = this.cloneAny(obj.userData);
//     return ret;
// }

// public cloneSkinnedMesh(obj: THREE.SkinnedMesh, parent: THREE.Object3D): THREE.SkinnedMesh {
//     let geo = obj.geometry.clone();
//     let mat = obj .material;
//     mat = (obj.material as THREE.MeshPhongMaterial).clone();
//     let ret = new THREE.SkinnedMesh(geo,mat);
//     let bones = new Array<THREE.Bone>();

//     obj.skeleton.bones.forEach((b) => {
//         let nb = parent.getObjectByName(b.name) as THREE.Bone;
//         bones.push(nb);
//     });

//     ret.skeleton = new THREE.Skeleton(bones);

//     obj.skeleton.boneMatrices.forEach((bm,bmi) => {
//         ret.skeleton.boneMatrices[bmi] = bm;
//     });
//     obj.skeleton.boneInverses.forEach((bi,bii) => {
//         ret.skeleton.boneInverses[bii] = bi;
//     });
//     obj.bindMatrix.elements.forEach((e,ei) => {
//         ret.bindMatrix.elements[ei] = e;
//     });
//     obj.bindMatrixInverse.elements.forEach((e,ei) => {
//         ret.bindMatrixInverse.elements[ei] = e;
//     });

//     return ret;
// }

// public cloneAny(obj: any): any {
//     let ret = {};
//     Object.getOwnPropertyNames(obj).forEach((pn) => {
//         ret[pn] = obj[pn];
//     });
//     return ret;
// }
//}
