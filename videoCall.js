const APP_ID = "0ecb341c2a8c42bea3e54fbf79606b40";
const TOKEN = "007eJxTYNjTqSfMbfP2/vUPjA6LHZ6el+qpT1ZS412mqqMvVlWxOVWBIcXCzMzSONnEzNzEyMQ4MdEyMTHF3CTN3MzEzCQlycLwv0BDSkMgI8OyAhdWRgYIBPHZGfILshKzE8sZGADpfx37+ewxx0aUVvc/w8Xqcnd9TnTpBTYEixMDOzNE42MTM3MTIxTky0TExMMTdJMzczMTNJSbIw3JxfmdIQyMiwL/gwKyMDBIL4LAy5iZl5DAwAM90fOw==";
const CHANNEL = "opjakaw";

const client = AgoraRTC.createClient({ mode: "rtc", codec: "vp8" });


let localTracks = [];
let remoteUsers = {};
//let username = document.getElementById('myElement').innerHTML;


let joinAndDisplayLocalStream = async () => {
  client.on("user-published", handleUserJoined);

  client.on("user-left", handleUserLeft);

  let UID = await client.join(APP_ID, CHANNEL, TOKEN, null);

  localTracks = await AgoraRTC.createMicrophoneAndCameraTracks();

  let player = `
    <div class="video-container" id="user-container-${UID}">
        <div class="video-player" id="user-${UID}"></div>
    </div>
  `;
  document.getElementById("video-streams").insertAdjacentHTML("beforeend", player);

  localTracks[1].play(`user-${UID}`);

  await client.publish([localTracks[0], localTracks[1]]);
};

let joinStream = async () => {
  await joinAndDisplayLocalStream();
  document.getElementById("join-btn").style.display = "none";
  document.getElementById("stream-controls").style.display = "flex";
};

let handleUserJoined = async (user, mediaType) => {
  remoteUsers[user.uid] = user;
  await client.subscribe(user, mediaType);

  if (mediaType === "video") {
    let player = document.getElementById(`user-container-${user.uid}`);
    if (player != null) {
      player.remove();
    }

    player = `
      <div class="video-container" id="user-container-${user.uid}">
        <div class="video-player" id="user-${user.uid}"></div>
        <div class="username">${document.getElementById('username').innerHTML}</div>
      </div>`;
    document.getElementById("video-streams").insertAdjacentHTML("beforeend", player);

    user.videoTrack.play(`user-${user.uid}`);
  }

  if (mediaType === "audio") {
    user.audioTrack.play();
  }
};

let handleUserLeft = async (user) => {
  delete remoteUsers[user.uid];
  document.getElementById(`user-container-${user.uid}`).remove();
};

let leaveAndRemoveLocalStream = async () => {
  for (let i = 0; localTracks.length > i; i++) {
    localTracks[i].stop();
    localTracks[i].close();
  }

  await client.leave();
  document.getElementById("join-btn").style.display = "block";
  document.getElementById("stream-controls").style.display = "none";
  document.getElementById("video-streams").innerHTML = "";
};

let toggleMic = async (e) => {
  if (localTracks[0].muted) {
    await localTracks[0].setMuted(false);
    e.target.innerHTML = '<i class="bx bxs-microphone"></i> Mic On';
    e.target.style.backgroundColor = "cadetblue";
  } else {
    await localTracks[0].setMuted(true);
    e.target.innerHTML = '<i class="bx bx-microphone-off"></i> Mic Off';
    e.target.style.backgroundColor = "#EE4B2B";
  }
};

let toggleCamera = async (e) => {
  if (localTracks[1].muted) {
    await localTracks[1].setMuted(false);
    e.target.innerHTML = '<i class="bx bxs-video"></i> Camera On';
    e.target.style.backgroundColor = "cadetblue";
  } else {
    await localTracks[1].setMuted(true);
    e.target.innerHTML = '<i class="bx bx-video-off"></i> Camera Off';
    e.target.style.backgroundColor = "#EE4B2B";
  }
};

document.getElementById("join-btn").addEventListener("click", joinStream);
document.getElementById("leave-btn").addEventListener("click", leaveAndRemoveLocalStream);
document.getElementById("mic-btn").addEventListener("click", toggleMic);
document.getElementById("camera-btn").addEventListener("click", toggleCamera);
